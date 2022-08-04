<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script> 

        <title>Gestão de Candidatos</title>

        <style>
            .arquivos {
                margin: 20px 0;
            }
            .table > tbody > tr > td {
                vertical-align: baseline;
            }
        </style>
    </head>
    <body> 
        <div class="container">
            <div class="row g-3 ">
                <h4>Pesquisa Por Ano</h4>
                
                <div class="col-md-2">
                    <input type="input" class="form-control" id="localizar" />
                </div>

                <div class="col-md-3">
                    <button type="button" class="btn btn-primary buscar_registro">Buscar</button>                    
                </div>

                <div class="col-md-2">                   
                    <button type="button" class="btn btn-primary" id="botaoCadastro">Cadastrar</button>
                </div>

                <div class="col-md-5 msgAlert"></div>

            </div>  
            <div id="retForm">
                <table class="table table-hover">
                    <thead>
                    <tr>                    
                        <th scope="col">Nome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">#</th>
                        <th scope="col">#</th>
                    </tr>
                    </thead>
                    <tbody></tbody> 
                </table> 
            </div> 
        </div>
        

        <!-- Modal Cadastro -->
        <div class="modal fade" id="modal-cadastra-candidato" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header align-self-center ">
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form  method="POST" action="/cadastro" class="row g-3">
                                @csrf
                                <hr>
                                <div class="row" style="text-align: center;">
                                    <h4>Dados Pessoais</h4>
                                    <div class="col-md-1">
                                        <Label>Ano</Label>
                                        <input type="text"class="form-control" name="ano">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Nome</label>
                                        <input type="text" class="form-control" name="name" >
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label">Email</label>
                                        <input type="text" class="form-control" name="email">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Telefone</label>
                                        <input type="text" class="form-control" name="telefone">
                                    </div>                           
                                </div>
                                <hr>
                                <div class="row" style="padding-top: 10px; text-align: center;">
                                    <h4>Dados Profissionais</h4>
                                    <div class="col-md-3">
                                        <label class="form-label">Empresa</label>
                                        <input type="text" class="form-control" name="nome_da_empresa">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Localidade</label>
                                        <input type="text" class="form-control" name="localidade">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Função</label>
                                        <input type="text" class="form-control" name="funcao">
                                    </div>                           
                                    <div class="col-md-3">
                                        <label class="form-label">Descrição da função</label>
                                        <input type="text" class="form-control" name="descricao_funcao">
                                    </div>                           
                                    <div class="col-md-3">
                                        <label class="form-label">Mês de início</label>
                                        <input type="text" class="form-control" name="inicio_mes">
                                    </div>                           
                                    <div class="col-md-3">
                                        <label class="form-label">Ano de início</label>
                                        <input type="text" class="form-control" name="inicio_ano">
                                    </div>                           
                                    <div class="col-md-3">
                                        <label class="form-label">Mês de término</label>
                                        <input type="text" class="form-control" name="termino_mes">
                                    </div>                           
                                    <div class="col-md-3">
                                        <label class="form-label">Ano de término</label>
                                        <input type="text" class="form-control" name="termino_ano">
                                    </div>                           
                                </div>
                                <hr>
                                <div class="row" style="text-align: center;">
                                    <h4>Dados de acesso</h4>
                                    <div class="col-md-6">
                                        <label class="form-label">Login</label>
                                        <input type="text" class="form-control" name="usuario">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Senha</label>
                                        <input type="text" class="form-control" name="senha">
                                    </div>                        
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-10"></div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="submit" class="btn btn-primary " data-bs-dismiss="modal">Enviar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>

        <!-- Modal Editar -->
        <div class="modal fade" id="modal-edita-candidato" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header align-self-center ">
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <form class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label">Nome</label>
                                    <input type="text" class="form-control nome" >
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Email</label>
                                    <input type="text" class="form-control email" >
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">Telefone</label>
                                    <input type="text" class="form-control telefone" >
                                </div>                           
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <h6></h6>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary updateModal" data-bs-dismiss="modal">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Modal Deletar -->
        <div class="modal fade" id="modal-deleta-candidato" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Deletar Candidato</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Deseja mesmo deletar esse candidato?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="deletarCandidato" >Deletar</button>
                        
                    </div>
                </div>
            </div>
        </div>
        
    </body>
    <script>
        
        let modalCadastraCandidato = new bootstrap.Modal(document.getElementById('modal-cadastra-candidato'));
        let modalEditaCandidato = new bootstrap.Modal(document.getElementById('modal-edita-candidato'));
        let modalDeletaCandidato = new bootstrap.Modal(document.getElementById('modal-deleta-candidato'));

        $(document).ready(function() {

            $('#botaoCadastro').click(function () {
                modalCadastraCandidato.show();
            });
            
            $('.buscar_registro').click(function() {

                $('#retForm tbody').empty();

                let registro = $('#localizar').val();           

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'GET',
                    url: `/api/consultar?registro=${registro}`,
                    beforeSend: function () {
                        $('#retForm tbody').html(`
                            <i style="margin-left: 430px; margin-top: 100px;" class="fas fa-spinner fa-8x fa-spin"></i><br><b style="font-size:28px; margin-left: 430px; margin-top: 100px;">Buscando ...</b>
                        `);
                    },
                }).done(function(dados) {

                    let candidatos = dados.candidatos; 
                    
                    $('#retForm tbody').html('');               
                    
                    candidatos.map(candidato => {
                        $('#retForm tbody').append(`
                            <tr>
                                <td scope="row">${candidato.name}</td>
                                <td scope="row">${candidato.email}</td>
                                <td scope="row">${candidato.telefone}</td>
                                <td scope="row"><button type="button" class="btn btn-primary btn-sm botaoEditar" data-toggle="modal" data-target="#modal-edita-candidato" value="${candidato.id}">Editar</button></td>
                                <td scope="row"><button type="button" class="btn btn-danger btn-sm botaoExcluir" data-toggle="modal" data-target="#modal-deleta-candidato" value="${candidato.id}">Excluir</button></td>
                            </tr>
                        `);
                    });

                    $('.botaoEditar').click(function() {

                        modalEditaCandidato.show();
                        let idCandidato = $(this).val();
                        
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            type: 'GET',
                            url: `/api/modal-editar-candidato?id=${idCandidato}`,
                        }).done(function(dados) {

                            let edicaoCandidato = dados.edicao;

                            edicaoCandidato.map(edicao => {
                                $('.nome').val(`${edicao.name}`);
                                $('.email').val(`${edicao.email}`);
                                $('.telefone').val(`${edicao.telefone}`);
                                $('.updateModal').val(`${edicao.id}`);
                            });
                        });
                    });

                    $('.botaoExcluir').click(function () {
                        
                        modalDeletaCandidato.show();
                        let idCandidato = $(this).val();

                        $('#deletarCandidato').val(`${idCandidato}`);
                    
                    });
                });            
            });  

            $('.updateModal').click(function() {

                let id = $(this).val();
                let nome = $('.nome').val();
                let email = $('.email').val();
                let telefone = $('.telefone').val();

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'PUT',
                    url: `/api/editar-candidato`,
                    data: {
                        'id' : id,
                        'nome' : nome,
                        'email': email,
                        'telefone': telefone,
                    }
                }).done(function(dados) {

                    $('#retForm tbody').html('');               
                    
                    $('.msgAlert').empty();

                    $('.msgAlert').append(`
                        <div class="alert alert-success col-md-4 hidden " role="alert">
                            <strong>Atualizado!</strong>
                        </div> 
                    `);

                    $('.alert').fadeTo(1, 1).removeClass('hidden');
                    
                    window.setTimeout(function() {
                        $('.alert').fadeTo(500, 0).slideUp(500, function(){
                            $('.alert').addClass('hidden');
                        });
                    }, 1000);                
                    
                });
                
            }); 
            
            $('#deletarCandidato').click(function() {

                let id = $(this).val();

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'DELETE',
                    url: `/api/deletar-candidato?id=${id}`,
                }).done(function(dados) {

                    $('#retForm tbody').html('');  

                    $('.msgAlert').empty();

                    $('.msgAlert').append(`
                        <div class="alert alert-danger col-md-4 hidden " role="alert">
                            <strong>Deletado!</strong>
                        </div> 
                    `);

                    $('.alert').fadeTo(1, 1).removeClass('hidden');
                    
                    window.setTimeout(function() {
                        $('.alert').fadeTo(500, 0).slideUp(500, function(){
                            $('.alert').addClass('hidden');
                        });
                    }, 1000);
                    
                });
            });  
            
        });

    </script>
</html>