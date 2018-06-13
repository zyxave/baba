var
a,i,k,j,t,l:longint;
n,x:array[0..100000009] of longint;
y,hasil:array[0..10009] of longint;
r:string;
begin
        readln(a);
        for i:= 1 to a do begin
            readln(x[i]);
            for j:= 1 to x[i] do read(y[j]);

                hasil[i]:=0;
        for k:= 1  to x[i] do begin
              hasil[i]:=hasil[i]+y[k];   end;

end;

  for i:= 1 to a do begin
            if (hasil[i] mod 3 <> 0)
  then writeln('No')
            else writeln('Yes');
        end;
        readln;
        readln;
        end.
