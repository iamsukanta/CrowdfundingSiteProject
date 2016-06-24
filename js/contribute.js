/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function() {

    $('#chosen_perk_count').bind('input', function() {

        var perk_value = $('#chosen_perk_value').val().trim();

        var c = $('#chosen_perk_count').val().trim();
        if ($.isNumeric(c))
        {
            $('#total_contribution_amount').text(c * perk_value);
        }
        else
        {
            $('#total_contribution_amount').text("0");
        }
    });
});


