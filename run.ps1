$Json = Get-content ./config.json | ConvertFrom-Json
cd views
echo $Json.pathtoPHP
Start-Process -FilePath $Json.pathtoPHP -ArgumentList "-S localhost:3000"
cd ..
#Start-Process cmd.exe -ArgumentList "/c node ."
