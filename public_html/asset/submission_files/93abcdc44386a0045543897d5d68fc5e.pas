var
 t,i,j,k,n1:longword;
 x,y,n,m:array [1..10000] of longword;
 p:array [1..1000,1..1000] of longword;
begin
	readln(t);
	for i:=1 to t do
		begin
			readln(n[i],m[i]);
			for j:=1 to n[i] do
			 readln(p[i,j]);
		end;
	for i:=1 to t do
	begin
		n1:=0;
		for j:=1 to n[i] do
			for k :=1 to n[i] do
				if (p[i,j]+p[i,k]=m[i]) then 
				 begin
					x[i]:=p[i,j];
					y[i]:=p[i,k];
					n1:=n1+1;
				 end;
		if n1=0 then writeln('Billy rapopo')
		else writeln(x[i],' ',y[i]);
	end
end.