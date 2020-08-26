$(document).ready(function() {
    // [ editable1 ]
    
    // [ editable2 ]
    $('#example-2').Tabledit({

        columns: {

            identifier: [0, 'id'],

            editable: [
                [0, 'data_id'],
                [1, 'replicate'],
                [2, 'evs_id'],
                [3, 'perc_reads']
            ]

        }

    });
});


