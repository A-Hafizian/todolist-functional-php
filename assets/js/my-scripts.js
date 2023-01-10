$(function () {
    let number = 0;
    $('#new-task-form').submit(function () {

        let value = $('#new-task').val();

        if (value != null && value != '') {

            number++;

            $('<li class="animate__animated animate__flipInX"><input type="checkbox" id="task_' + number + '"><label for="task_' + number + '">' + value + '</label><a href="#" class="remove">Remove</a></li>')
                .appendTo('#tasks-list')

            $('#new-task').val('');
        }

        return false;
    })

    $('body').on('change', ':checkbox[id^="task_"]', function () {
        countRemainTasks();
    });

    $('#hide-completed').change(function () {
        if ($(this).is(':checked')) {
            $(':checkbox[id^="task_"]:checked')
                .parent()
                .hide()
        }else{
            $(':checkbox[id^="task_"]:checked')
                .parent()
                .show()

        }
    });

    $('#search-box').on('input',function(){
        let value = $(this).val();
        console.log(value);

        if (value!='' && value!=null) {
            $('#tasks-list li').hide();

            $('#tasks-list label:contains("'+value+'")')
                .parent('li')
                .show();

        }

    })

    $('body').on('click','.remove',function () {
        $(this).closest('li').remove();
    })
});

function countRemainTasks() {
    let allCheckboxCount = $(':checkbox[id^="task_"]').length;
    let selectedCount = $(':checkbox[id^="task_"]:checked').length;

    let remain_tasks = allCheckboxCount - selectedCount;

    $('#remain_tasks').text(remain_tasks);

}