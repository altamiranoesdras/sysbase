<template>
    <form method="post" @submit.prevent="submit" @keydown="clearErrors($event.target.name)" >

        <!--Mensaje inicio sesión exitoso-->
        <div class="alert alert-success text-center" v-show="form.succeeded" id="result">
            {{ trans('adminlte_lang_message.loggedin') }}
            <i class="fa fa-refresh fa-spin"></i>
            {{ trans('adminlte_lang_message.entering') }}
        </div>

        <!--Campo usuario-->
        <div class="form-group">
            <input type="text" class="form-control" name="username"
                   :class="{ 'is-invalid': form.errors.has('username') }"
                   :placeholder="trans('adminlte_lang_message.username')"
                   v-model="form.username">

            <transition name="fade">
                <div class="invalid-feedback"
                     v-if="form.errors.has('username')"
                     v-text="form.errors.get('username')"
                     id="validation_error_username">
                </div>
            </transition>
        </div>

        <!--Campo contraseña-->
        <div class="form-group">
            <input type="password" class="form-control" name="password"
                   :class="{ 'is-invalid': form.errors.has('password') }"
                   :placeholder="trans('adminlte_lang_message.password')"
                   v-model="form.password">

            <transition name="fade">
                <div class="invalid-feedback"
                     v-if="form.errors.has('password')"
                     v-text="form.errors.get('password')"
                     id="validation_error_password">
                </div>
            </transition>
        </div>

        <!--Check recuerdame-->
        <div class="form-check">
            <!--<div class="checkbox icheck">-->
                <!--<label>-->
                    <!--<input type="checkbox" name="remember" v-model="form.remember"> {{ trans('adminlte_lang_message.remember') }}-->
                <!--</label>-->
            <!--</div>-->
        </div>

        <!--Botón submit-->
        <button type="submit" class="btn btn-outline-primary btn-block"
                v-text="trans('adminlte_lang_message.buttonsign')"
                :disabled="form.errors.any()">
            <i v-if="form.submitting" class="fa fa-refresh fa-spin"></i>
        </button>
    </form>
</template>

<style src="./fade.css"></style>

<script>

    import Form from 'acacha-forms'
    import initialitzeIcheck from './InitializeIcheck'
    import redirect from './redirect'

    export default {
        mixins: [initialitzeIcheck, redirect],
        data: function () {
            let form = new Form({ username: '', password: '', remember: '' })
            return {
                form: form,
            }
        },
        props: {
            name: {
                type: String,
                required: true
            },
            domain: {
                type: String,
                required: false
            }
        },
        watch: {
            'form.remember': function (value) {
                if (value) {
                    $('input').iCheck('check')
                } else {
                    $('input').iCheck('uncheck')
                }
            }
        },
        methods: {
            submit () {
                this.form.post('/login')
                    .then(response => {

                        var component = this;
                        setTimeout(function(){
                            component.redirect(response)
                        }, 500);
                    })
                    .catch(error => {
                        console.log(error.response.data)
                    })
            },
            clearErrors (name) {
                if (name === 'password') {
                    this.form.errors.clear('password')
                    name = this.name
                }
                this.form.errors.clear(name)
            }
        },
        mounted () {
            this.initialitzeICheck('remember')
        },
    }

</script>
