document.addEventListener("DOMContentLoaded", function() {
    // 偵測掃描按鈕點擊
    const scanButton = document.querySelector('.clamav-button');
    const resultContainer = document.querySelector('.result-container');
 
   if (scanButton) {
        scanButton.addEventListener('click', function() {
            // 你可以在這裡發送 AJAX 請求到服務器以開始掃描
            startScan();
        });
    }
    
    // 切換掃描結果詳情的可見性
    const toggleDetailsButton = document.querySelector('.toggle-details-button');
    if (toggleDetailsButton) {
        toggleDetailsButton.addEventListener('click', function() {
            const details = document.querySelector('.scan-details');
            if (details) {
                details.style.display = (details.style.display === 'none' || details.style.display === '') ? 'block' : 'none';
            }
        });
    }
});

// 這是一個假設的 startScan 函數，你需要根據你的需求來實現它
function startScan() {
    fetch('/path/to/your/scan/api', {
        method: 'POST',
        // 其他選項和配置
    })
    .then(response => response.json())
    .then(data => {
        // 處理服務器返回的掃描結果
        displayResults(data);
    })
    .catch(error => {
        console.error('掃描出錯:', error);
    });
}

function displayResults(data) {
    const resultContainer = document.querySelector('.result-container');
    if (!resultContainer) {
        return;
    }

    let output = `<h3>掃描結果</h3>`;
    
    // 假設 data 是一個包含多個掃描結果的數組
    data.forEach(item => {
        output += `<div class="scan-item">
            <p>目錄: ${item.directory}</p>
            <p>檔案數: ${item.files}</p>
            <p>感染檔案數: ${item.infected}</p>
            <p>掃描時間: ${item.time} 秒</p>
        </div>`;
    });
    
    resultContainer.innerHTML = output;
}
