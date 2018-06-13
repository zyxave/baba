#include<stdio.h>
#include<string.h>
int main ()
{
	int t;
	scanf("%d",&t);
	for(int a=0;a<=t-1;a++)
	{
		char kalimat[100000];
		scanf("%s",&kalimat);
		int jumlah=strlen(kalimat);
		int arr[26];
		int c=0;
		for(int b=0;b<=25;b++)
			arr[b]=0;
		for(int b=0;b<jumlah;b++)
			if(kalimat[b]==kalimat[b+1])
				arr[c]++;
			else if(kalimat[b]!=kalimat[b+1])
			{
				arr[c]++;
				c++;	
			}
		int arrr[4];
		int drr[4];
		int d=0;
		for(int b=0;b<=25;b++)
			for(int m=0;m<=24;m++)
				if(arr[m]>=arr[m+1])
				{
					int tumpang=arr[m];
					arr[m]=arr[m+1];
					arr[m+1]=tumpang;
				}
		for(int b=0;b<=2;b++)
		{
			arrr[b]=0;
			drr[a]=0;
		}
		int e=0;
		for(int b=0;b<26;b++)
		{
			if(arr[b]==0)
			{
				e++;
			}
		}
		for(int b=e;b<=25;b++)
		{
			if(arr[b]==arr[b+1])
			{
				arrr[d]++;
				drr[d]=arrr[d];
			}
			else
			{
				arrr[d]++;
				d++;
			}
		}
		if(d==1)
			printf("YES\n");
		else if(d==2)
		{
			if(arrr[0]>1&&arrr[1]>1)
				printf("NO\n");
			else if(arr[e]==1)
				printf("YES\n");
			else if(arr[25]==arr[24]+1)
				printf("YES\n");
			else
				printf("NO\n");
		}
		else
			printf("NO\n");
	}
}
