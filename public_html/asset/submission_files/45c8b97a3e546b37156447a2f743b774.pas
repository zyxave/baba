var
 t,i:byte;
 j,k:word;
 x:longword;
 n,y:array [1..100] of longint;
 m:array [1..10000,1..10000] of longint;

begin
	readln(t);
	for i:=1 to t do
		begin
			readln(n[i]);
			for j:=1 to n[i] do
				read(m[i,k]);
		end;
	for i:=1 to t do
		begin
			x:=100000;
			for j:=1 to n[i] do
			 for k:=1 to n[i] do
			  if m[i,j]<x then
				x:=m[i,j];
			for j:=1 to n[i] do
				begin
				m[i,j]:=m[i,j]-x;
				if m[i,j]>0 then y[i]:=y[i]+1;
				end;
		end;
	for i:=1 to t do
		if y[i]>1 then writeln('Norlam')
		else writeln('Marlon');
end.
