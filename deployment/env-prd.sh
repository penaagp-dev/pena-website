#!/bin/bash
vault kv get -format=json production/prd-pena-web | jq -r '.data.data | to_entries | .[] | "\(.key)=\(.value)"' >> .env