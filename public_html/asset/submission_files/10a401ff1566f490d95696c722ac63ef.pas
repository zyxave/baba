var c,f,n,k,i,j,l:longint;
p,q:array[1..1] of integer;
function koef(a,b:longint):longint;
	begin
	c:=1;
	for i:= 1 to a do begin
		c:=c*i;
	end;
	for i:= 1 to b do begin
		c:= c div i;
	end;
	for i:= 1 to a-b do begin
		c:= c div i;
	end;
	koef:=c;
	end;
	
function pangkat(d,e:longint):longint;
		begin
		f:=1;
		for j:= 1 to e do begin
			f:=f*d;
		end;
		pangkat:=f;
		end;
	
begin
readln(n);
for k:= 1 to n do readln(p[k],q[k]);
for k:= 1 to n do begin
	write('x',q[k],' ');
	for l:= 1 to q[k]-1 do begin
		if q[k]-l = 1 then write(koef(q[k],l)*pangkat(p[k],l),'x',' ')
		else write(koef(q[k],l)*pangkat(p[k],l),'x',q[k]-l,' ');
	end;
	writeln(pangkat(p[k],q[k]));
end;
end.