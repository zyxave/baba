var
	i,x,a,b,c,d,e,f:longint;
begin
	readln(x);
	for i:=1 to x do begin
		c:=0;
		readln(a,b);
		c:=(a-b);
		d:=c div 100;
		c:=c-(d*100);
		e:=c div 20;
		c:=c-(e*20);
		f:=c div 5;
		c:=c-(f*5);
		writeln(c+d+e+f);
	end;
end.