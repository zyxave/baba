var
 x,ratusan,sisa,duapuluhan,sisa2,satuan,hasil,limaan,j,k: longint;
 begin
 read(j);
 read(k);
 x:= j-k;
 ratusan:= x div 100;
 sisa:= x mod 100;
 duapuluhan:= sisa div 20;
 sisa2:= sisa mod 20;
 limaan:= sisa2 div 5;
 satuan:= sisa2 mod 5;
 hasil:= ratusan+duapuluhan+limaan+satuan;
 write(hasil);
end.
