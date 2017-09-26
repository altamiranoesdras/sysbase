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
     * Genera el menu que se muestra en la seccion sidebar
     * @param $opciones
     * @param int $parent
     * @return string
     */
    public function render($opciones,$parent=0){

        $result = $parent==0 ? "<ul class=\"sidebar-menu\"><li class=\"header\"></li>" : "<ul class=\"treeview-menu\">";
        foreach ($opciones as $op)
        {
            if ($op->padre == $parent){
                $ruta= $op->ruta."";
                $ruta = url($ruta);
                $has_children= ($this->has_children($opciones,$op->id) || $op->padre=="") ? true : false;

                $result.= $has_children ? "<li class='treeview'>" : "<li>";
                $result.= "<a href=\"{$ruta}\">";
                $result.= "<i class=\"fa {$op->icono_l}\"></i>";
                $result.= $has_children ? "<span>{$op->nombre}</span>" : $op->nombre;
                $result.= "<i class=\"fa {$op->icono_r} pull-right\"></i>";
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
                $rutaNew= url("/admin/option/create/{$op->id}");

                $result.= "<li class='list-group-item' id='{$op->id}' ><span class='glyphicon glyphicon-resize-vertical'></span> <b>{$op->nombre}</b>";
                $result.= " <a href=\"{$rutaNew}\" class='text-green text-sm' data-toggle=\"tooltip\" title=\"Nueva opcion\"><span class=\"glyphicon glyphicon-plus\"></span></a>";
                $result.= " <a href=\"{$actionEdit}\" data-toggle=\"tooltip\" title=\"Editar\"><span class='glyphicon glyphicon-edit'></span></a>";
                $result.= " <a data-toggle='modal' href='#modal-delete' data-action=\"{$actionDelet}\" class='text-danger btn-delete' ><span class=\"glyphicon glyphicon-remove\"  data-toggle=\"tooltip\" title=\"Eliminar\"></span></a>";

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

                $result.= "<li>";
                $result.= "<div class=\"checkbox\">
                                	<label>
                                		<input type=\"checkbox\" value=\"{$op->id}\" name=\"opciones[]\" { $checked }>
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