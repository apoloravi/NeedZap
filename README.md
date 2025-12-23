<p align="center">
  <img src="https://i.imgur.com/1DP3Mi8.png" alt="NeedZap Logo" width="180">
</p>

<h1 align="center">NeedZap PlaySMS Proxy</h1>

<p align="center">
Integração entre <strong>MK-Auth / PlaySMS</strong> e a <strong>API NeedZap</strong> utilizando GET → POST
</p>

---

## 🎯 Objetivo

Este projeto permite que sistemas que **enviam mensagens apenas via GET**
(como o PlaySMS utilizado no MK-Auth) consigam enviar mensagens de WhatsApp
através da **API NeedZap**, que utiliza **POST com autenticação Bearer Token**.

Arquitetura da solução:


---

## 🚀 Instalação (RÁPIDA)

Execute os comandos abaixo como **root** ou usuário com permissão:

```bash
cd /var/www/
git clone https://github.com/apoloravi/NeedZap.git
cd NeedZap
chmod +x install.sh
./install.sh
