@echo off
cls
:start
"C:\\Program Files (x86)\\Steam\\SteamApps\\common\\Terraria\\TerrariaServer.exe" -config serverconfig.txt
@echo.
@echo Restarting server...
@echo.
goto start