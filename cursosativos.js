function botaoCursoConluidoFoiClickado(id) {
    var element = document.getElementById(id);
    element.classList.add('clicked');

    var certificado = document.getElementById('certificado' + id);
    certificado.disabled = false;
}

function emitirCertificado(curso) {
    window.location.href = 'certificado.php?';
}