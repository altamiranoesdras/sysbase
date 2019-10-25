<?php
/**
 * Created by PhpStorm.
 * User: Usuario
 * Date: 9/03/2017
 * Time: 4:22 PM
 */

namespace App;


class Menu{

    /**
     * Comprueba si una opcion tien sub opciones
     * @param $opciones
     * @param $id
     * @return bool
     */
    public function has_children($opciones,$id) {
        foreach ($opciones as $op) {
            if ($op->padre == $id)
                return true;
        }
        return false;
    }

    /**
     * Nuevo menu que se muestra en la seccion sidebar
     * @param $opciones
     * @param int $parent
     * @return string
     */
    public function render($opciones,$parent=0){

        $result = $parent==0 ? "<ul class=\"nav nav-pills nav-sidebar flex-column\" data-widget=\"treeview\" role=\"menu\" data-accordion=\"true\">" : "<ul class=\"nav nav-treeview\">";

        foreach ($opciones as $op)
        {
            if ($op->padre == $parent){

                try{
                    $rout =route($op->ruta.'');
                }catch (\Exception $e){
                    $rout = '';
                };

                $has_children= ($this->has_children($opciones,$op->id) || $op->padre=="") ? true : false;

                $result.= $has_children ? "<li class=\"nav-item has-treeview\">" : "<li class=\"nav-item\">";
                $result.= $op->nombre=='separador' ? "" : "<a href=\"{$rout}\" class=\"nav-link\">";
                $result.= $op->nombre=='separador' ? "" : "<i class=\"fa {$op->icono_l} nav-icon\"></i>";
                $result.= "<p>";
                $result.= $op->nombre=='separador' ? '':  $op->nombre ;
                if ($op->icono_r){
                    $result.= $has_children ? "<i class=\"right  fa {$op->icono_r}\"></i>" : "";
                }
                $result.= "</p>";
                $result.= "</a>";

                if ($this->has_children($opciones,$op->id))
                    $result.= $this->render($opciones,$op->id);
                $result.= "</li>";
            }
        }
        $result.= "</ul>";

        return $result;
    }


    /**
     * Genera el menu con opciones para crear, editar y eliminar las opciones
     * @param $opciones
     * @param int $parent
     * @return string
     */
    public function renderAdmin($opciones,$parent=0){

        $result = "<ul class=\"sortable list-group\">";

        foreach ($opciones as $op) {
            if ($op->padre == $parent){

                $actionEdit = action('OptionMenuController@edit',$op->id);
                $actionDelet = action('OptionMenuController@destroy',["id" => $op->id]);
//                $rutaNew= url("/admin/option/create/{$op->id}");
                $rutaNew= route('option.create',$op->id);

                $result.= "<li class='list-group-item' id='{$op->id}' ><span class='fa fa-arrows-alt'></span>&nbsp;&nbsp;<b>{$op->nombre}</b>";
                $result.= " &nbsp;<a href=\"{$rutaNew}\" class='text-success text-sm' data-toggle=\"tooltip\" title=\"Nueva opcion\"><span class=\"fa fa-plus\"></span></a>";
                $result.= " &nbsp;<a href=\"{$actionEdit}\" data-toggle=\"tooltip\" title=\"Editar\"><span class='fa fa-edit'></span></a>";
                $result.= " &nbsp;<a data-toggle='modal' href='#modal-delete' data-action=\"{$actionDelet}\" class='text-danger btn-delete' ><span class=\"fa fa-trash-alt\"  data-toggle=\"tooltip\" title=\"Eliminar\"></span></a>";

                if ($this->has_children($opciones,$op->id))
                    $result.=  $this->renderAdmin($opciones,$op->id);
                $result.= "</li>";
            }
        }
        $result.= "</ul>";


        return $result;
    }

    /**
     * Genera el menu con checkbos en cada opción para asignar o quitar opciones al usuario
     * @param $opciones
     * @param int $parent
     * @param $usuario
     * @return string
     */
    public function renderUser($opciones,$parent=0,$usuario){

        $opcionesUsuario =  array_pluck($usuario->opciones->toArray(),'id');

        $result = "<ul>";

        foreach ($opciones as $op) {
            if ($op->padre == $parent){

                $checked = in_array($op->id,$opcionesUsuario) ? 'checked' : '';

                $tienHijos = $this->has_children($opciones,$op->id) ? 1 : 0;
                $tienPadre = $op->padre ? 1 : 0;

                $result.= "<li>";
                $result.= "<div class=\"checkbox\">
                                	<label>
                                		<input type=\"checkbox\" value=\"{$op->id}\" name=\"opciones[]\"  data-tiene-hijos='$tienHijos' data-tiene-padre='$tienPadre' $checked >
                                		{$op->nombre}
                                	</label>
                                </div>";

                if ($this->has_children($opciones,$op->id))
                    $result.= $this->renderUser($opciones,$op->id,$usuario);
                $result.= "</li>";
            }
        }
        $result.= "</ul>";


        return $result;
    }

}