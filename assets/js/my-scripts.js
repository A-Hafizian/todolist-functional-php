$(function () {
    let number = 0;
    

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

        if (value!='' && value!=null) {
            $('#tasks-list li').hide();

            $('#tasks-list label:contains("'+value+'")')
                .parent('li')
                .show();

        }

    })

   /*  $('body').on('click','a.remove',function () {
        //$(this).closest('li').remove();
    }) */
});

function countRemainTasks() {
    let allCheckboxCount = $(':checkbox[id^="task_"]').length;
    let selectedCount = $(':checkbox[id^="task_"]:checked').length;

    let remain_tasks = allCheckboxCount - selectedCount;

    $('#remain_tasks').text(remain_tasks);

}