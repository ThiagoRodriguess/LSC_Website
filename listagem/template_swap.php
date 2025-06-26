<?php 
# Template name: Swap to alumni
get_header();
?>

<div class="espacador">
    <div class="central_inputs">
        <label for="">
            Student input:
            <textarea name="" id="info_input" placeholder="Student input"></textarea>
        </label>
        <label for="">
            Academic level:
            <select name="" id="type_select">
                <option value="MSc">MSc</option>
                <option value="PhD">PhD</option>
                <option value="postdoc">postdoc</option>
            </select>
        </label>
        <label for="">
            Advisor:
            <select name="" id="advisor_select">
                <option value="Guido Costa Souza de Araújo">Guido Costa Souza de Araújo</option>
                <option value="Rodolfo Azevedo">Rodolfo Azevedo</option>
                <option value="Sandro Rigo">Sandro Rigo</option>
                <option value="Ricardo Pannain">Ricardo Pannain</option>
                <option value="Paulo César Centoducatte">Paulo César Centoducatte</option>
                <option value="Lucas Francisco Wanner">Lucas Francisco Wanner</option>
                <option value="Hervé Cédric Yviquel">Hervé Cédric Yviquel</option>
                <option value="Isaías Bittencourt Felzmann">Isaías Bittencourt Felzmann</option>
            </select>
        </label>
        <label for="">
            Year of defense:
            <input type="number" name="" id="year_defense">
        </label>
        <label for="">
            Current Position:
            <input type="text" name="" id="current_position">
        </label>
        <label for="">
            Alumni output:
            <input type="text" name="" id="info_output" placeholder="Alumni output">
        </label>
        <button onclick=swap_function2()>Generate and copy Alumni output</button>
        <a class='input_links' href="https://https://docs.google.com/spreadsheets/d/1AF5ilPVCf_f10OMedaJP-n2XgHZxRuCVIhkg8LT6BsQ/edit?gid=1195475715#gid=1195475715" target="_blank" rel="noopener noreferrer">Alumni spreadsheet</a>
        <a class='input_links' href="https://lsc.ic.unicamp.br/alumni/" target="_blank" rel="noopener noreferrer">Alumni Page</a>
    </div>
</div>




<?php 
get_footer();
?>