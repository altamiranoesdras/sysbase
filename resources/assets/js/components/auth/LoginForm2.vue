<template>
    <form method="post" @submit.prevent="submit" @keydown="clearErrors($event.target.name)">
        <div class="alert alert-success text-center" v-show="form.succeeded" id="result">
        {{ trans('adminlte_lang_message.loggedin') }}
        <i class="fa fa-refresh fa-spin"></i>
        {{ trans('adminlte_lang_message.entering') }}
        </div>


        <div class="form-group has-feedback" :class="{ 'has-error': form.errors.has('username') }" >
            <input type="text" class="form-control" :placeholder="trans('adminlte_lang_message.username')" name="username" v-model="form.username"  autofocus/>
            <transition name="fade">
                <span class="help-block" v-if="form.errors.has('username')" v-text="form.errors.get('username')" id="validation_error_username"></span>
            </transition>
        </div>


        <div class="form-group has-feedback" :class="{ 'has-error': form.errors.has('password') }">
            <input type="password" class="form-control" :placeholder="trans('adminlte_lang_message.password')" name="password" v-model="form.password"/>
            <transition name="fade">
                <span class="help-block" v-if="form.errors.has('password')" v-text="form.errors.get('password')" id="validation_error_password"></span>
            </transition>
        </div>

        <div class="row">
            <!--<div class="col-sm-6">-->
                <!--<div class="checkbox icheck">-->
                    <!--<label>-->
                        <!--<input type="checkbox" name="remember" v-model="form.remember"> {{ trans('adminlte_lang_message.remember') }}-->
                    <!--</label>-->
                <!--</div>-->
            <!--</div>-->
            <div class="col-sm-12">
                <button type="submit" class="btn btn-outline-success btn-block" v-text="trans('adminlte_lang_message.buttonsign')" :disabled="form.errors.any()">
                    <i v-if="form.submitting" class="fa fa-refresh fa-spin"></i>
                </button>
            </div>
        </div>

    </form>
</template>

<style src="./fade.css">

</style>

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
                    this.redirect(response)
                })
                .catch(error => {
                    console.log(this.trans('adminlte_lang_message.loginerror') + ':' + error)
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
