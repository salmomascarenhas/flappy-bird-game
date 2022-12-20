<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/settings.css">
</head>

<body>
    <div class="content">
        <h1>Configurações ⚙️</h1>
        <form id="settings-form">
            <div>
                <input name="username" type="text" placeholder="Digite seu nome" class="inputs required"
                    oninput="nameValidate()">
                <span class="span-required">Nome deve ter no mínimo 3 caracteres</span>
            </div>
            <p>Cenário:</p>
            <div class="box-select">
                <div>
                    <input name="scenary" type="radio" id="day" value="day">
                    <label for="m">Day</label>
                </div>
                <div>
                    <input name="scenary" type="radio" id="night" value="night">
                    <label for="f">Night</label>
                </div>
            </div>
            <button type="submit">Prosseguir</button>
        </form>
    </div>
</body>
<script>
    const settingsForm = document.getElementById('settings-form');
    const campos = document.querySelectorAll('.required');
    const spans = document.querySelectorAll('.span-required');

    settingsForm.addEventListener('submit', async (event) => {
        event.preventDefault();
        nameValidate();

        const formData = new FormData(settingsForm);

        const data = await fetch('insertSettings.php', {
            method: 'POST',
            body: formData
        })

        if (await data.json())
            window.location.href = 'index.php';

    });

    function setError(index) {
        campos[index].style.border = '2px solid #e63636';
        spans[index].style.display = 'block';
    }

    function removeError(index) {
        campos[index].style.border = '';
        spans[index].style.display = 'none';
    }

    function nameValidate() {
        if (campos[0].value.length < 3) {
            setError(0);
        }
        else {
            removeError(0);
        }
    }

</script>

</html>