<template>

    <div>
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Users</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">

            <div class="container-fluid">

                <div class="row">

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">:)</h3>

                                <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="height: 300px;">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Email</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="user in users">
                                        <td>{{user.id}}</td>
                                        <td>{{user.name}}</td>
                                        <td>{{user.email}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-lg-6">

                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Novo Usuário</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="form-horizontal" @submit.prevent="onSubmit" @keydown="form.errors.clear()">
                                <div class="card-body" style="height: 239px;">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-2 col-form-label">Nome</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="nome" name="nome" required autocomplete="nome" autofocus placeholder="Nome" v-model="form.nome">
                                            <span class="invalid-feedback d-block" role="alert" v-if="form.errors.has('nome')" v-text="form.errors.get('nome')"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="usuario" class="col-sm-2 col-form-label">Usuário</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="usuario" name="usuario" required autocomplete="usuario" autofocus placeholder="usuario" v-model="form.usuario">
                                            <span class="invalid-feedback d-block" role="alert" v-if="form.errors.has('usuario')" v-text="form.errors.get('usuario')"></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputEmail3" placeholder="Email" v-model="form.email" required>
                                                <span class="invalid-feedback d-block" role="alert" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></span>
                                            </div>

                                        </div>

                                    <div class="form-group row">

                                        <label for="senha" class="col-sm-2 col-form-label">Senha</label>
                                        <div class="col-sm-10">
                                            <input type="senha" class="form-control" id="senha" placeholder="Senha" v-model="form.password" required>
                                            <span class="invalid-feedback d-block" role="alert" v-if="form.errors.has('senha')" v-text="form.errors.get('senha')"></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info" :disabled="form.errors.any()">Adicionar Usuário</button>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>

                    </div>

                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /.content -->

    </div>

</template>

<script>
    export default {
        data() {
            return {
                users: [],
                form: new Form({
                    'nome': '',
                    'usuario': '',
                    'email': '',
                    'senha': '',
                    'senha_confirmacao': ''
                })
            }
        },
        created() {
            axios.get('/usuarios')
                .then(({data}) => this.users = data);
        },
        methods: {
            onSubmit(){
                this.form.senha_confirmacao = this.form.password; // Temp for this form only.
                this.form
                    .post('/usuarios')
                    .then(user => this.users.push(user));
            }
        }
    }
</script>