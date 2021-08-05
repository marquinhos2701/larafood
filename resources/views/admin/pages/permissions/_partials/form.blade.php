@include('admin.includes.alerts')
@csrf

<div class="form-group">
    <label><b>* Nome:</b></label>
    <input type="text" name="name" class="form-control" placeholder="Nome da Permissão:" value="{{ $permission->name ?? old('name') }}">
</div>
<div class="form-group">
    <label><b>Descrição:</b></label>
    <input type="text" name="description" class="form-control" placeholder="Descrição da Permissão:" value="{{ $permission->description ?? old('description') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>