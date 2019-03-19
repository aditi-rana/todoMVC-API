var task = document.getElementById("task");
task.addEventListener("keydown", function (e) {
    if (e.keyCode === 13) {
        add();
    }
});


add = function () {

    var taskValue = task.value;
    task.value = "";

    t.add(taskValue, false);



    render();
}