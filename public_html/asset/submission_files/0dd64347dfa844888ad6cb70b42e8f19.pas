var
	t,i,piro: integer;
	a,b,back: array[1..1000] of integer;
begin
	readln(t);
	for i := 1 to t do begin
		read(a[i], b[i]);
		back[i] := a[i] - b[i];
	end;
	
	for i := 1 to t do begin
		piro := 1;
		
		while back[i] - 100 > 0 do begin
			back [i] := back[i] - 100;
			inc(piro);
		end;
		
		while back[i] - 20 > 0 do begin
			back [i] := back[i] - 20;
			inc(piro);
		end;
		
		while back[i] - 5 > 0 do begin
			back [i] := back[i] - 5;
			inc(piro);
		end;
		
		while back[i] - 1 > 0 do begin
			back [i] := back[i] - 1;
			inc(piro);
		end;
		
		if not (i = t) then
		writeln(piro)
		else write(piro);
	end;
	
end.