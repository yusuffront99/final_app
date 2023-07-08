<!-- SHIFT G -->
<script>
     // ===== G 
    let tot_wa_g = <?php echo json_encode($tot_wa_g); ?>;
    let tot_fw_g = <?php echo json_encode($tot_fw_g); ?>;
    let tot_rj_g = <?php echo json_encode($tot_rj_g); ?>;
    let tot_wo_g = <?php echo json_encode($tot_wo_g); ?>;
    let tot_wm_g = <?php echo json_encode($tot_wm_g); ?>;
    let tot_rs_g = <?php echo json_encode($tot_rs_g); ?>;
  
    const labels_G = ['Waiting Approval','Forwarding','Rejected','Working','Waiting Material','Resolved/Normal'];
    // const labels = Utils.months({count: 7});
    const data_G = {
    labels: labels_G,
    datasets: [{
        label: 'SHIFT G',
        data: [tot_wa_g, tot_fw_g, tot_rj_g, tot_wo_g, tot_wm_g, tot_rs_g],
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
const config_G = {
    type: 'bar',
    data: data_G,
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
    const myChart_G = new Chart(
    document.getElementById('myChart-G'),
    config_G
);
</script>