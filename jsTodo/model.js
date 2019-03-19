function todoItem(caption, isCompleted) {

    this.id;

    this.caption = caption;
    this.isCompleted = isCompleted;

    this.setid = function (id) {
        this.id = id;
        console.log(this.id);
    }

    this.getid = function () {
        return this.id;
    }

    this.toggle = function () {
        this.isCompleted = !this.isCompleted;

    }
}


function todoCollection() {

    this.todo = [];

    this.add = function (caption, isCompleted) {

        var newItem = new todoItem(caption, isCompleted);
        this.todo.push(newItem);

        $.ajax({
            url: "http://todo.local.geekydev.com/apiTodo/",
            type: "POST",
            data: {
                "caption": caption,
            },
            success: function (data) {
                newItem.setid(data);
            }
        });
    }

    this.remove = function (i) {

        var id = this.todo[i].getid();
        console.log(id);
        $.ajax({
            url: "http://todo.local.geekydev.com/apiTodo/",
            type: "DELETE",
            data: {
                "id": id,
            },
            success: function () {
                console.log("Success");
            }
        });

        this.todo.splice(i, 1);


    }


}