<!-- Modal -->
<div class="modal fade" id="modalTarget{{$club->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apagar Dados do clube</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <p>Ao apagar dados do clube, irá apagar todos dados relacionados...</p>
            <p>Tem certeza que quer continuar?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
        <form method="POST" action="{{ route('admin.club.delete', $club->id) }}">
            <input name="_method" type="hidden" method='DELETE' value="DELETE">
            {!! csrf_field() !!}
            <a  class="btn btn-danger" href="{{ route('admin.club.delete', $club->id) }}">Sim</a>
        </form>
      </div>
    </div>
  </div>
</div>