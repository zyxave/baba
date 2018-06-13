#include<bits/stdc++.h>
using namespace std;
int main()
{
	int t;
	int n;
	int i,j;
	int hasil[100];
	cin>>t;
	for(i=1;i<=t;i++)
	{
		cin>>n;
		int k=21;
		if (n<k){
			hasil[i]=n;
		}
		else 
		{
			for (j=1;j<=8;j++)
			{
				 if (n-k<10 && n-k>=0)
				 {
				 	hasil[i]=10+k/10+n-k+1;
				 	cout<<hasil[i]<<endl;
				 }
				 k=k+10;
			}
		}
	}
	for(i=1;i<=t;i++)
	{
		cout<<hasil[i]<<endl;
	}
}
