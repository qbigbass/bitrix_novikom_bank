@echo off
mklink /D "%~dp0s1\upload" "%~dp0upload"
mklink /D "%~dp0s1\local" "%~dp0local"
mklink /D "%~dp0s1\bitrix" "%~dp0bitrix"
mklink /D "%~dp0s1\frontend" "%~dp0frontend"