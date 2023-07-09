<script>
  const dateElement = document.getElementById('waktu');

  function updateClock() {
    const now = new Date();
    const options = {
      timeZone: 'Asia/Jakarta'
    };
    const formattedDate = now.toLocaleString('en-GB', {
      // day: '2-digit',
      // month: '2-digit',
      // year: 'numeric',
      hour: '2-digit',
      minute: '2-digit',
      second: '2-digit',
      timeZoneName: 'short'
    });
    // const formattedTimeZone = now.toLocaleString('en-GB', {
    //   timeZoneName: 'short'
    // });

    dateElement.textContent = `${formattedDate}`;
  }

  updateClock();
</script>