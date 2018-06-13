#include<bits/stdc++.h>
using namespace std;

int main()
{
	
	bool lam[1000000];
	int n;
	int ku;
	int k;
	int i;
	int j;
	int ak[1000];//akumulasi
	//padam = false
	cin>>ku;
	for (i=1;i<=ku;i++)
	{
		ak[i]=0;
		cin>>n;
		for(j=0;j<=n-1;j++)
		{
			lam[j]=false;
		}
		for(j=0;j<=n-1;j++)
		{
			for(k=0;k<=n-1;k++)//perubahan padaa lampu ke k
			{
				if (k%j==1)
				{
					lam[k]=!lam[k];
				}
			}
		}
		for(j=0;j<=n-1;j++)
		{
			if (lam[j]==true)
			{
				ak[i]++;
			}
		}
	}
	for(i=1;i<=ku;i++)
	{
		cout<<ak[i]<<endl;
	}
}
