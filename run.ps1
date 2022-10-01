$Json = Get-content ./config.json | ConvertFrom-Json
cd views
ls
$inistrng = "-C " + $Json.pathtoPHPconfig
Start-Process -FilePath $Json.pathtoPHP -ArgumentList "-S localhost:3000"
#Start-Process cmd.exe -ArgumentList "/c node ."
