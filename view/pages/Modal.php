<section>
    <button type="button" class="nes-btn is-primary" onclick="document.getElementById('dialog-default').showModal();">
        Open dialog
    </button>
    <dialog class="nes-dialog" id="dialog-default">
        <form method="dialog">
            <p class="title">Dialog</p>
            <p>Alert: this is a dialog.</p>
            <menu class="dialog-menu">
                <button class="nes-btn">Cancel</button>
                <button class="nes-btn is-primary">Confirm</button>
            </menu>
        </form>
    </dialog>
</section>