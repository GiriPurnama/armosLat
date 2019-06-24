 <!-- Edit -->
 <div class="modal-pf modal fade" id="user-edit-modal-{{$value['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalAdd" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="fa fa-close"></i>
                        </button>
                        <h3>Edit User</h3>
                    </div>
                    {!! Form::open(['url' => 'update']) !!}
                    <div class="modal-body">
                            <div class="form-group">
                                <label>Username</label>
                                {!! Form::hidden('id', $value["id"], ['class' => 'form-control']) !!}
                                {!! Form::text('username', $value["userName"], ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group">
                                <label>Firstname</label>
                                {!! Form::text('firstname', $value["firstName"], ['class' => 'form-control', 'placeholder' => 'Input Firstname', 'required']) !!}
                            </div>
                            <div class="form-group">
                                <label>Lastname</label>
                                {!! Form::text('lastname', $value["lastName"], ['class' => 'form-control', 'placeholder' => 'Input Lastname', 'required']) !!}
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="button button-pf blue float-rg ">Create</button>
                        <button class="button button-pf grey float-rg" data-dismiss="modal" >Cancel</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    

<!-- Delete Modal -->
<div class="modal fade" id="delete{{$value['id']}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    <i class="fa fa-close"></i>
                </button>
				<h4 class="modal-title text-center" id="myModalLabel">Delete User</h4>
			</div>
			<div class="modal-body">
                {!! Form::open(['url' => 'delete']) !!} 
                    {!! Form::hidden('id', $value["id"], ['class' => 'form-control']) !!}
					<h4 class="text-center">Are you sure you want to delete Member?</h4>
					<h5 class="text-center">Name: {{$value['firstName']}} {{$value['lastName']}}</h5>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
				{{Form::button('<i class="fa fa-trash"></i> Delete', ['class' => 'btn btn-danger', 'type' => 'submit'])}}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>