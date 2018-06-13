#include <stdio.h>
#include <bits/stdc++.h>

using namespace std;
int main()
{
	int tc;
	cin>>tc;
	for(int U=0;U<tc;U++)
	{
		int a=0,n,d,r;
		cin>>n;
		cin>>d;
		cin>>r;
		
		int A[n];
		int B[n];
		int Hasil[n];
		
		for(int x=0;x<n;x++)
		{
			cin>>A[x];
			
		}
		
		for(int x=0;x<n;x++)
		{
			cin>>B[x];
		}
		
		
		for(int x=0;x<n;x++)
		{
			Hasil[x] = ((A[x] + B[x]) - d) * r;
			if (Hasil[x]<0)
				Hasil[x]= 0;
				
			a = Hasil[x] + a;
			
		}
		
		cout<<a<<"\n";
	}
}
 

