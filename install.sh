#!/bin/bash

echo "======================================"
echo " NeedZap - Integração WhatsApp API"
echo " Desenvolvido por Apolo Ravi"
echo "======================================"
echo

read -p "Informe o TOKEN da NeedZap: " TOKEN
read -p "Informe a EXTERNAL_KEY da NeedZap: " EXTERNAL_KEY

cp needzap.php.example needzap.php

sed -i "s|{{TOKEN}}|$TOKEN|g" needzap.php
sed -i "s|{{EXTERNAL_KEY}}|$EXTERNAL_KEY|g" needzap.php

chmod 644 needzap.php

echo
echo "✅ Instalação concluída com sucesso!"
echo
echo "📍 Arquivo criado em:"
echo "   /var/www/NeedZap/needzap.php"
echo
echo "🌐 Acesse pelo navegador ou use no PlaySMS / MK-Auth"
echo
echo "NeedZap"
echo "https://needzap.net"
echo "WhatsApp: 22 99613-5700"
