<!-- Modal -->
<div class="modal fade" id="forcedmodal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="forcedmodal-header">Lage auflegen oder neu erstellen</h1>
      </div>
      <div class="modal-body" id="forcedmodal-body">
        <p>Aktuell ist keine Lage aufgelegt. Bitte gib hier den Namen der neuen Lage ein, oder lege eine bereits bestehende Lage wieder auf.</p>
       
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name der neuen Lage (Datum wird automatisch hinzugefügt):</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="separator">oder</div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Bereits erstellte Lagen:</label>
            <select class="form-control" id="open-situation-list">
              <option>Waldbrand xyz...</option>
            </select>
          </div>
          <div class="separator">oder</div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Lage aus Alarmeingang erstellen:</label>
            <select class="form-control" id="open-alarminbox-list">
              <option>Waldbrand xyz...</option>
            </select>
          </div>
        </form>
        <br>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Weiter</button>
        </div>
      </div>
    </div>
  </div>
</div>