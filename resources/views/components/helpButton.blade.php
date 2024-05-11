<!-- Botón de ayuda -->
<button id="helpButton" onclick="toggleForm()" style="
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 1050;
    background-color: #d6d6d6; /* Gris claro */
    color: #333; /* Color del texto más oscuro para contraste */
    border: none;
    padding: 15px;
    border-radius: 50%;
    cursor: pointer;
    width: 50px;
    height: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    transition: background-color 0.3s ease;
">
    ?
</button>

<!-- Formulario de ayuda -->
<div id="helpForm" style="display:none; position: fixed; bottom: 80px; right: 20px; padding: 20px; background: white; box-shadow: 0 4px 8px rgba(0,0,0,0.2); border-radius: 8px; z-index: 1050; width: 300px;">
    <form action="{{ route('support.send') }}" method="POST">
        @csrf
        <div style="margin-bottom: 10px;">
            <input type="text" name="name" placeholder="Nombre" value="{{ auth()->user()->name }}" readonly style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 10px;">
            <input type="email" name="email" placeholder="Correo" value="{{ auth()->user()->email }}" readonly style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 10px;">
            <textarea name="description" placeholder="Describa su problema" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; height: 100px;"></textarea>
        </div>
        <button type="submit" style="width: 100%; padding: 8px 16px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;">Enviar</button>
    </form>
</div>

<script>
function toggleForm() {
    var form = document.getElementById('helpForm');
    form.style.display = (form.style.display === 'none' ? 'block' : 'none');
}

const helpButton = document.getElementById('helpButton');
helpButton.onmouseover = function() {
    this.style.backgroundColor = '#bbbaba'; // Un gris un poco más claro al pasar el mouse
};
helpButton.onmouseout = function() {
    this.style.backgroundColor = '#d6d6d6'; // Color original
};
</script>