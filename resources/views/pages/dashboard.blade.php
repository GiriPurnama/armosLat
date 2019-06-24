<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        @include('includes.css')
        <title>Dashboard</title>
    </head>
    <body class="cards-pf grey">
        @include('layouts.header')
        @include('layouts.sidebar')
 
        <div class="content-wrapper container-fluid container-cards-pf">
            <div class="row row-cards-pf">
                <div class="header-pf">
                    <h3>Manage User</h3>
                </div>
                <div class="content-map-pf">
                    <div class="card-pf pf-table">
                        <div class="btn-map">
                            <button class="button button-pf blue small-size border-pf float-rg" data-toggle="modal" data-target="#company-modal">Add User <i class="fa fa-plus"></i></button>
                        </div>
                        <div class="clear"></div>
                        <table id="product-table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>isActive</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $value)
                                <tr>
                                    <td> {{$value["userName"]}}  </td>
                                    <td> {{$value["firstName"]}}  </td>
                                    <td> {{$value["lastName"]}}  </td>
                                    <td>Active</td>
                                    <td class="action-role">
                                        <a href="javascript:void(0)" class="updateId" data-id="" data-toggle="modal" data-target="#user-edit-modal-{{$value['id']}}">
                                            <span><i class="fa fa-gear"></i></span>
                                        </a>
                                        <a href="javascript:void(0)" class="updateId" data-id="" data-toggle="modal" data-target="#delete{{$value['id']}}">
                                            <span><i class="fa fa-trash"></i></span>
                                        </a>
                                        @include('includes.modal')
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal User -->

        <!-- Add -->
        <div class="modal-pf modal fade" id="company-modal" tabindex="-1" role="dialog" aria-labelledby="myModalAdd" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="fa fa-close"></i>
                        </button>
                        <h3>Add User</h3>
                    </div>
                    {!! Form::open(['url' => 'create']) !!}
                    <div class="modal-body">
                            <div class="form-group">
                                <label>Username</label>
                                {!! Form::text('username', '', ['class' => 'form-control', 'placeholder' => 'Input Username', 'required']) !!}
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Input Password', 'required']) !!}
                            </div>
                            <div class="form-group">
                                <label>Firstname</label>
                                {!! Form::text('firstname', '', ['class' => 'form-control', 'placeholder' => 'Input Firstname', 'required']) !!}
                            </div>
                            <div class="form-group">
                                <label>Lastname</label>
                                {!! Form::text('lastname', '', ['class' => 'form-control', 'placeholder' => 'Input Lastname', 'required']) !!}
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="button button-pf blue float-rg btnSignup">Create</button>
                        <button class="button button-pf grey float-rg" data-dismiss="modal" >Cancel</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

    </body>

    <script>
        $(document).ready(function() {
            $('#product-table').DataTable({
            "pageLength": 10,
            "order": [[ 0, "asc" ]]
            });
            
            $(".btnSignup").click(function(){
                $("#addUser").submit();
                $("#add-user-modal").modal("hide");
            });
            
            $(".btnCompany").click(function(){
                $("#company").submit();
                $("#company-modal").modal("hide");
            });
            
            $(".btnEdit").click(function(){
                $("#usrEdit").submit();
                $("#user-edit-modal").modal("hide");
            });
            
            $(".updateId").click(function(){
                var usrUpdate = $(this).attr("data-id");
                console.log(usrUpdate);
                $(".userUpdate").val(usrUpdate);
            });
            
        });
        
        var allowsubmit = false;
            $(function(){
                //on keypress 
                $('#ConfirmPassword').keyup(function(e){
                    //get values 
                    var pass = $('#inputPassword').val();
                    var confpass = $(this).val();
                    
                    //check the strings
                    if(pass == confpass){
                        //if both are same remove the error and allow to submit
                        $('.error').text('');
                        $(".btnSignup").prop('disabled', false);
                        allowsubmit = true;
                    }else{
                        //if not matching show error and not allow to submit
                        $('.error').text('Password not matching');
                        $(".btnSignup").prop('disabled', true);
                        allowsubmit = false;
                    }
                });
            });

        function check_uncheck_checkbox(isChecked) {
            if(isChecked) {
                $('input:checkbox').each(function() { 
                this.checked = true; 
                });
            } else {
                $('input:checkbox').each(function() {
                this.checked = false;
                });
            }
        }
    </script>
</html>