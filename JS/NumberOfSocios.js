function GetAllSocios() {
    $.post('../Handlers/NumberOfSociosHandler.php?action=GetAllSocios', function (response) {
        var JsonObject = JSON.parse(response);

        JsonObject.forEach(e => {
            var Sexo = "";
            if (e.Sexo == "0")
                Sexo = "M";
            else
                Sexo = "F";

            var UserType = "";
            if (e.UserType == EnumUserType.Presidente)
                UserType = "Presidente";
            else if (e.UserType == EnumUserType.VicePresidente)
                UserType = "Vice Presidente";
            else if (e.UserType == EnumUserType.Socio)
                UserType = "Sócio(a)";
            else if (e.UserType == EnumUserType.Tesoureiro)
                UserType = "Tesoureiro(a)";

            jQuery('<tr/>', {
                id: "Socio" + e.id,
                "onclick": "OpenFichaDeSocio('" + e.id + "')"
            }).appendTo('#TableSociosBody');

            jQuery('<td/>', {}).appendTo('#Socio' + e.id).text(e.Nome);

            jQuery('<td/>', {}).appendTo('#Socio' + e.id).text(Sexo);

            jQuery('<td/>', {}).appendTo('#Socio' + e.id).text(e.Idade);

            jQuery('<td/>', {}).appendTo('#Socio' + e.id).text(e.DataDeInscricao);

            jQuery('<td/>', {}).appendTo('#Socio' + e.id).text(e.DataDeQuotas);

            jQuery('<td/>', {}).appendTo('#Socio' + e.id).text(e.Email);

            jQuery('<td/>', {}).appendTo('#Socio' + e.id).text(UserType);

            jQuery('<td/>', {}).appendTo('#Socio' + e.id).text(e.DataDeNascimento);
        });
    });
}

function OpenFichaDeSocio(id) {
    
    window.open(
        '../HTML/Socio.php?id=' + id,
        '_blank'
    );
}

$(document).ready(function () {
    $('.filterable .btn-filter').click(function () {
        var $panel = $(this).parents('.filterable'),
            $filters = $panel.find('.filters input'),
            $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });

    $('.filterable .filters input').keyup(function (e) {
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var $input = $(this),
            inputContent = $input.val().toLowerCase(),
            $panel = $input.parents('.filterable'),
            column = $panel.find('.filters th').index($input.parents('th')),
            $table = $panel.find('.table'),
            $rows = $table.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var $filteredRows = $rows.filter(function () {
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="' + $table.find('.filters th').length + '">No result found</td></tr>'));
        }
    });
});