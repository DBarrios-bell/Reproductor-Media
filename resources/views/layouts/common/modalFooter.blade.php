</div>
      <div class="modal-footer">
            <button type="button" wire:click.prevent="resetUI()"  class="btn btn-dark text-info" data-dismiss="modal" data-dimmis="modal">Close</button>

          @if($selected_id < 1)
          <button type="button" wire:click.prevent="Store()" class="btn btn-dark close-modal">Guardar</button>
          @else
          <button type="button" wire:click.prevent="Update()" class="btn btn-dark close-modal ">Actualizar</button>
          @endif
        </div>
    </div>
  </div>
</div>