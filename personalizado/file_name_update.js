document.getElementById('file_input').addEventListener('change', insert_text)
document.getElementById("copy_input").addEventListener('click', copying_file_name)

function insert_text() {
    // console.log('inserting text')
    file_name = (document.getElementById('file_input').files[0].name).toLowerCase()
    // inserting text
    add_info = new Date()
    document.getElementById("copy_input").value = '/' + add_info.getFullYear() + '/' + ("0" + (add_info.getMonth()+1)).slice(-2) + '/' +file_name;
    // changing background image
    document.getElementById("copy_input").style.backgroundImage = "url(https://lsc.ic.unicamp.br/wp-content/personalizado/assets/copy.jpeg)"
}

function copying_file_name() {
    // console.log('changing')
    // Get the text field
    var copyText = document.getElementById("copy_input");
  
    // Select the text field
    copyText.select();
    copyText.setSelectionRange(0, 99999); // For mobile devices
  
    // Copy the text inside the text field
    add_info = new Date()
    navigator.clipboard.writeText(copyText.value);
    
    // changing bckg image
    document.getElementById("copy_input").style.backgroundImage = "url(https://lsc.ic.unicamp.br/wp-content/personalizado/assets/check.jpeg)"
}