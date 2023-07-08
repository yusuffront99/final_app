<!-- SHIFT E -->
<script>
     // ===== E
    let tot_wa_e = <?php echo json_encode($tot_wa_e); ?>;
    let tot_fw_e = <?php echo json_encode($tot_fw_e); ?>;
    let tot_rj_e = <?php echo json_encode($tot_rj_e); ?>;
    let tot_wo_e = <?php echo json_encode($tot_wo_e); ?>;
    let tot_wm_e = <?php echo json_encode($tot_wm_e); ?>;
    let tot_rs_e = <?php echo json_encode($tot_rs_e); ?>;
  
    const labels_E = ['Waiting Approval','Forwarding','Rejected','Working','Waiting Material','Resolved/Normal'];
    // const labels = Utils.months({count: 7});
    const data_E = {
    labels: labels_E,
    datasets: [{
        label: 'SHIFT E',
        data: [tot_wa_e, tot_fw_e, tot_rj_e, tot_wo_e, tot_wm_e, tot_rs_e],
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
const config_E = {
    type: 'bar',
    data: data_E,
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
    const myChart_E = new Chart(
    document.getElementById('myChart-E'),
    config_E
);
</script>