# SPNSRDco
## Usage
1) Go to [config.json](config.json) and change the pathtoPHP value to the location of your instalation of PHP.
2) Replace the `php.ini` file in your PHP directory with [php.ini](php.ini)
3) Change the port to whatever integer between  1 and 65535 (you may run into issues with ports below 1024 as common services run on these)
4) Right click (run.ps1)[run.ps1] (Windows specific, adapt to your OS requirements) and click run with powershell. This will open the service on `localhost:yourport`
