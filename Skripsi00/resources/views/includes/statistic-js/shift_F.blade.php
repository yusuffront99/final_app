<!-- SHIFT E -->
<script>
     // ===== E
    let tot_wa_f = <?php echo json_encode($tot_wa_f); ?>;
    let tot_fw_f = <?php echo json_encode($tot_fw_f); ?>;
    let tot_rj_f = <?php echo json_encode($tot_rj_f); ?>;
    let tot_wo_f = <?php echo json_encode($tot_wo_f); ?>;
    let tot_wm_f = <?php echo json_encode($tot_wm_f); ?>;
    let tot_rs_f = <?php echo json_encode($tot_rs_f); ?>;
  
    const labels_F = ['Waiting Approval','Forwarding','Rejected','Working','Waiting Material','Resolved/Normal'];
    // const labels = Utils.months({count: 7});
    const data_F = {
    labels: labels_F,
    datasets: [{
        label: 'SHIFT F',
        data: [tot_wa_f, tot_fw_f, tot_rj_f, tot_wo_f, tot_wm_f, tot_rs_f],
        backgroundColor: [
            '#FFDF6A',
            '#11ABDF',
            '#eb4034',
            '#D876D8',
            '#c9600a',
            '#6EE29F'
        ],
        borderColor: [
            '#FFDF6A',
            '#11ABDF',
            '#eb4034',
            '#D876D8',
            '#c9600a',
            '#6EE29F',
        ],
        color: [
            'red',
            'white',
            'white',
            'white',
        ],
        borderWidth: 1
    }]
};
const config_F = {
    type: 'bar',
    data: data_F,
    options: {
        scales: {
        y: {
            beginAtZero: true
        }
        }
    },
};
</script>

<script>
    const myChart_F = new Chart(
    document.getElementById('myChart-F'),
    config_F
);
</script>