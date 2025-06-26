<?php // Template Name: Alumni dinâmico
get_header();

$open = fopen(get_field('alumni_file'), "r");
$campos = fgetcsv($open, 10000, "\t", '"', "\\");
$data = transf_assoc_array($campos, $open, 'Aluno');
// print_r($data);

// ordenando em ordem decrecente de ano de defesa
uasort($data, function($a, $b) {
    return $b['Ano de defesa'] <=> $a['Ano de defesa'];
});

// agrupando alunos que defenderam no mesmo ano
$anos_defesa = array();
foreach ($data as $key => $infos) {
    if (empty($anos_defesa[$infos['Ano de defesa']])) {
        $anos_defesa[$infos['Ano de defesa']] = array($data[$key]);  
    } else {
        array_push($anos_defesa[$infos['Ano de defesa']], $data[$key]);
        
    }
}
// print_r($anos_defesa);
// print_r(count($anos_defesa));

// ordenando os grupos em ordem alfabética
foreach ($anos_defesa as $ano => $nomes) {
    // var_dump($anos_defesa[$ano]);
    uasort($anos_defesa[$ano], function($a, $b) {
        return ($a['Aluno'] < $b['Aluno']) ? -1 : 1;
    });
}
?>

<div class="telao">
    <div class="telao_filtro">

        <div class="telao_aux" ="background-color: #ffc">
            <h3>Alumni</h3>
        </div>
        <div class="telao_saia" ="background-color: #ff0">
            <svg viewBox="0 0 1000 100" preserveAspectRatio="none"><path d="M1000,50l-182.69,-45.286l-292.031,61.197l-190.875,-41.075l-143.748,28.794l-190.656,-23.63l0,70l1000,0l0,-50Z" style="opacity: 0.4"></path><path d="M1000,57l-152.781,-22.589l-214.383,19.81l-159.318,-21.471l-177.44,25.875l-192.722,5.627l-103.356,-27.275l0,63.023l1000,0l0,-43Z"></path></svg>
        </div>
    </div>
</div>

<div class="telinha">
    <p class="telinha_txt">
        Below is a list of LSC graduate students, and their first position in Industry and Academia <br>
        (to the best of our knowledge).
    </p>
</div>

<?php
echo '<div class="cards_container">';
    foreach($anos_defesa as $ano_def => $grupo_alunos) {
        // print_r($infos);
        foreach ($grupo_alunos as $aluno => $infos) {
            print_alumni($infos);
        }
    }
echo "</div>";

get_footer();
?>
