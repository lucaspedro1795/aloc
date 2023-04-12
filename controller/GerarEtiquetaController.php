<script type="text/javascript">
    $('#imprimir').click(function() {
        gerarEtiqueta();
    });

    var queryString = window.location.search;
    queryString = queryString.substring(1); // remove o "?" do início da string
    var pares = queryString.split("&");

    var parametros = {};
    for (var i = 0; i < pares.length; i++) {
        var par = pares[i].split("=");
        var chave = decodeURIComponent(par[0]);
        var valor = decodeURIComponent(par[1]);
        parametros[chave] = valor;
    }

    var parametro1 = parametros["cod_item"]; // valor1
    var parametro2 = parametros["nomeReg"]; // valor2

    var codigo = "Cód: " + parametro1;

    $('#codigo').html(codigo);
    $('#nomeReg').html(parametro2);

    let qrcode = "http://chart.googleapis.com/chart?cht=qr&chs=105x105&chl=" + parametro1 + "&chf=bg,s,C0C0C0";

    $('#qrCont').attr('src', qrcode);

    function gerarEtiqueta() {
        var WinPrint = window.open(
            "",
            "",
            "height=1000,width=1000,left=300,right=0"
        );

        WinPrint.document.write('<html><head><title>'+parametro1+'</title><link rel="preconnect" href="https://fonts.googleapis.com">' +
            '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' +
            '<link' +
            'href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap"' +
            'rel="stylesheet">' +
            '<style type="text/css" media="print">@media print {body {width: 100%;height: 100%;margin: 0;padding: 0;font-size: 12pt;}}</style>' +
            '</head>' +

            '<body>' +
            '<div style="display: flex;align-items: center;flex-direction: row;width: 300px;height: 106px;background-color: #C0C0C0;border-radius: 10px;">' +
            '<div style="border: 0px !important;border-radius: 30px;padding: 0px !important;margin: 0px !important;">' +
            '<img src="'+qrcode+'" alt="">' +
            '</div>' +
            '<div style="font-weight: 700; font-family: Nunito, sans-serif;">' +
            '<h5 style="font-size: 1.1em; margin-bottom: 0px; margin-top: 0px;">'+parametro2+'</h5>' +
            '<span>'+codigo+'</span>' +
            '</div>' +
            '</div>' +
            '</body>' +
            '</html>');

        WinPrint.print();
    }
</script>