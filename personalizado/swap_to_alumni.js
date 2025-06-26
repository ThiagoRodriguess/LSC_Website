input = document.getElementById("info_input")
input_fields = ['Carimbo de data/hora', 'Endereço de e-mail', 'Academic Level', 'File Name', 'Full Name', 'Contact Email', 'Course', 'Linkedin', 'Github', 'Lattes', 'Google Scholar', 'Advisor', 'Co-advisor', 'Research Title', 'Research Link', 'Personal Site']
output_fields = [
    "Tipo",
    "Ano de defesa",
    "Orientador",
    "Aluno",
    "Linkedin",
    "Github",
    "Lattes",
    "Site Pessoal",
    "Posição atual",
    "Foto"
];
intermed_array = []

output = document.getElementById("info_output")

input.addEventListener('change', swap_function)

function swap_function() {
    infos_array = ((input.value).replaceAll('\t.', '')).split('\t')
    infos_array.forEach((element, index, arr) => {
        intermed_array[input_fields[index]] = element
    });

    // preenchendo inputs auxs
    type = document.getElementById('type_select')
    advisor = document.getElementById('advisor_select')
    year = document.getElementById('year_defense')
    
    type.value = intermed_array['Academic Level']
    advisor.value = intermed_array['Advisor']
    
    ano = new Date()
    year.value = ano.getFullYear()

    // gerando output
    output_array = [
        type.value,
        year.value,
        advisor.value,
        intermed_array['Full Name'],
        intermed_array['Linkedin'],
        intermed_array['Github'],
        intermed_array['Lattes'],
        intermed_array['Site Pessoal'],
        document.getElementById('current_position').value,
        intermed_array['File Name']
    ]

    console.log(output_array.join('\t'))
    output.value = output_array.join('\t')

    navigator.clipboard.writeText(output.value);
}

function swap_function2() {
    // gerando output
    output_array = [
        type.value,
        year.value,
        advisor.value,
        intermed_array['Full Name'],
        intermed_array['Linkedin'],
        intermed_array['Github'],
        intermed_array['Lattes'],
        intermed_array['Site Pessoal'],
        document.getElementById('current_position').value,
        intermed_array['File Name']
    ]

    output.value = output_array.join('\t')

    navigator.clipboard.writeText(output.value);
}