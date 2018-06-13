#include <stdio.h>
#include <bits/stdc++.h>

using namespace std;
int main()
{
	long long int tc;
	cin>>tc;
	for(long long int U=0;U<tc;U++)
	{
		long long int a=0,n,d,r;
		cin>>n;
		cin>>d;
		cin>>r;
		
		long long int A[n];
		long long int B[n];
		long long int Hasil[n];
		
		for(long long int x=0;x<n;x++)
		{
			cin>>A[x];
			
		}
		
		for(long long int x=0;x<n;x++)
		{
			cin>>B[x];
		}
		
		
		for(long long int x=0;x<n;x++)
		{
			Hasil[x] = ((A[x] + B[x]) - d) * r;
			if (Hasil[x]<0)
				Hasil[x]= 0;
				
			a = Hasil[x] + a;
			
		}
		
		cout<<a<<"\n";
	}
}
 

