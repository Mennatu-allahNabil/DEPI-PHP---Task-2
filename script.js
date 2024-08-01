let departments = {
  first: ["General"],
  second: ["General"],
  third: ["AI", "CS", "IS", "SC"],
  fourth: ["AI", "CS", "IS", "SC"],
};

let level = document.getElementById("level");
let selectDept = document.getElementById("dept");


level.addEventListener("change", (event) => {
  console.log(event.currentTarget.value);
  if (event.currentTarget.value != "select-level") {

    while (selectDept.firstChild) {
      selectDept.removeChild(selectDept.firstChild);
    }
    selectDept.removeAttribute("disabled");
    
    console.log(departments[event.currentTarget.value]);
    depts = departments[event.currentTarget.value];
    console.log(typeof depts);
    console.log(Array(depts));
    depts.forEach((item) => {
    item=Array(item);
    item.forEach((sel)=>{
    opt = document.createElement("option");
    opt.value = sel;
    opt.textContent = sel;
    selectDept.appendChild(opt);
    });
    });
    
  }

  else{
    
    while (selectDept.firstChild){
        selectDept.removeChild(selectDept.firstChild);
    }
    selectDept.setAttribute("disabled","disabled");
    opt = document.createElement("option");
    opt.value = "select-level-first";
    opt.textContent = "Select a level first";
    selectDept.appendChild(opt);

  }
});
