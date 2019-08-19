function teamView(){
    var cd = document.getElementById('team__cd');
    var cs = document.getElementById('team__cs');
    var ss = document.getElementById('team__ss');
    var sa = document.getElementById('team__sa');
    cd.style.display = "none";
    cs.style.display = "none";
    ss.style.display = "none";
    sa.style.display = "none";
    var team = [cd, cs, ss, sa];
    for(i = 0; i < 4; i++){
        if(document.getElementById(i.toString()).checked){
            team[i].style.display = "block";
        }
    }
}